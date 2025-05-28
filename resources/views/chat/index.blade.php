
{{-- resources/views/chat/index.blade.php --}}

<x-app-layout>
    <div id="app">
        <div>
            <h4>Chat with {{ $user->name }}</h4>
            <div id="messages" style="height:300px; overflow-y:auto; border:1px solid #ccc; padding:10px;">
                <div v-for="message in messages" :key="message.id">
                    <strong v-if="message.sender_id == authUser">@{{ message.message }}</strong>
                    <span v-else>@{{ message.message }}</span>
                </div>
            </div>
            <input v-model="newMessage" @keyup.enter="sendMessage" class="form-control" placeholder="Type message...">
        </div>
    </div>

    <x-slot name="scripts">
        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
        <script>
            const authUser = {{ auth()->id() }};
            const receiverId = {{ $user->id }};

            new Vue({
                el: '#app',
                data: {
                    messages: [],
                    newMessage: '',
                },
                mounted() {
                    this.fetchMessages();
                    if (window.Echo) {
                        window.Echo.private(`chat.${authUser}`)
                            .listen('MessageSent', (e) => {
                                this.messages.push({
                                    sender_id: e.sender_id,
                                    message: e.message
                                });
                            });
                    }
                },
                methods: {
                    fetchMessages() {
                        fetch(`/chat/${receiverId}/messages`)
                            .then(res => res.json())
                            .then(data => this.messages = data);
                    },
                    sendMessage() {
                        if (!this.newMessage.trim()) return;
                        fetch(`/chat/${receiverId}/messages`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({ message: this.newMessage })
                        }).then(() => {
                            this.messages.push({ sender_id: authUser, message: this.newMessage });
                            this.newMessage = '';
                        });
                    }
                }
            });
        </script>
    </x-slot>
</x-app-layout>