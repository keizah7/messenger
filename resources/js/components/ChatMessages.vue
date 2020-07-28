<template>
    <div class="mesgs">
        <div v-if="contact">
            <div class="msg_history">
                <div v-for="message in messages"
                     :class="`${message.to !== contact.id ? 'incoming_msg' : 'outgoing_msg'}`"
                     :key="message.id">
                    <div class="incoming_msg_img" v-if="message.to !== contact.id">
                        <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                    </div>
                    <div :class="`${message.to !== contact.id ? 'received_msg' : 'sent_msg'}`">
                        <div :class="`${message.to !== contact.id ? 'received_withd_msg' : ''}`">
                            <p>{{ message.text }}</p>
                            <span class="time_date"> 11:01 AM | June 9</span>
                        </div>

                    </div>
                </div>
            </div>
            <chat-input @send="sendMessage"></chat-input>
        </div>
        <div v-else>
            Select a contact
        </div>
    </div>
</template>

<script>
    import ChatInput from "./ChatInput";

    export default {
        name: 'ChatMessages',

        props: {
            contact: {
                type: Object,
            },
            messages: {
                type: Array,
                default: [],
            },
        },

        methods: {
            sendMessage (message) {
                axios.post('/chat/send-message', {
                    text: message,
                    to: this.contact.id,
                }).then(response => {
                    this.$emit('newMessage', response.data);
                });
            },

            scrollToBottom () {
                setTimeout(() => {
                    let messagesContainer = this.$el.querySelector(".msg_history");
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;
                }, 50);
            }
        },

        watch: {
            contact (contact) {
                this.scrollToBottom();
            },
            messages (messages) {
                this.scrollToBottom();
            }
        },

        components: {ChatInput}
    }
</script>

<style>
    .msg_history {
        height: 516px;
        overflow-y: auto;
    }

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }

    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0;
        color: #fff;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }

    .sent_msg {
        float: right;
        width: 46%;
    }

    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }

    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }

    .received_withd_msg {
        width: 57%;
    }
</style>
