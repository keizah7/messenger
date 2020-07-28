<template>
    <div class="messaging">
        <div class="inbox_msg">
            <chat-contacts :contacts="contacts" @selected="showContactMessages"/>
            <chat-messages :contact="selectedContact" :messages="messages"/>
        </div>
    </div>
</template>

<script>
    import ChatContacts from "./ChatContacts";
    import ChatMessages from "./ChatMessages";

    export default {
        name: 'Chat',

        props: {
            auth: {
                type: String,
                required: true
            }
        },
        data () {
            return {
                contacts: [],
                selectedContact: null,
                messages: [],
            };
        },
        mounted () {
            axios.get('/contacts')
                .then(response => {
                    this.contacts = response.data;
                });
        },
        methods: {
            showContactMessages (contact) {
                axios.get(`/messages/${contact.id}`).then(response => {
                    this.selectedContact = contact;
                    this.messages = response.data;
                });
            }
        },
        components: {ChatContacts, ChatMessages},
    }
</script>

<style>
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }

    img {
        max-width: 100%;
    }

    .top_spac {
        margin: 20px 0 0;
    }

    .recent_heading {
        float: left;
        width: 40%;
    }

    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%;
        padding: 0;
    }

    .chat_ib h5 {
        font-size: 15px;
        color: #464646;
        margin: 0 0 8px 0;
    }

    .chat_ib h5 span {
        font-size: 13px;
        float: right;
    }

    .chat_ib p {
        font-size: 14px;
        color: #989898;
        margin: auto
    }

    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }

    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
    }

    .outgoing_msg {
        overflow: hidden;
        margin: 26px 0 26px;
    }

    .type_msg {
        border-top: 1px solid #c4c4c4;
        position: relative;
    }

    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }
</style>
