<template>
    <div class="inbox_people">
        <div class="headind_srch">
            <div class="recent_heading">
                <h4>Recent</h4>
            </div>
            <div class="srch_bar">
                <div class="stylish-input-group">
                    <input type="text" class="search-bar" placeholder="Search">
                    <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span></div>
            </div>
        </div>
        <div class="inbox_chat">
            <div class="chat_list"
                 v-if="contacts"
                 v-for="contact in contacts"
                 @click="selectContact(contact)"
                 :class="`${contact.id === selectedContactId ? 'active_chat' : ''}`"
            >
                <div class="chat_people">
                    <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
                    <div class="chat_ib">
                        <h5>{{ contact.name }} <span class="chat_date">-</span></h5>
                        <p>-</p>
                    </div>
                </div>
            </div>
            <div v-if="contacts.length === 0">
                <div class="chat_people">
                    <div class="chat_ib">
                        Where is no users to chat
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ChatContacts",

        data () {
            return {
                selectedContactId: 0
            }
        },

        props: {
            contacts: {
                type: Array,
            }
        },

        methods: {
            selectContact (contact) {
                this.selectedContactId = contact.id;
                this.$emit('selected', contact);
            }
        }
    }
</script>

<style>
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%;
        border-right: 1px solid #c4c4c4;
    }

    .headind_srch {
        padding: 10px 29px 10px 20px;
        overflow: hidden;
        border-bottom: 1px solid #c4c4c4;
    }

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }

    .srch_bar input {
        border: 1px solid #cdcdcd;
        border-width: 0 0 1px 0;
        width: 80%;
        padding: 2px 0 4px 6px;
        background: none;
    }

    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }

    .srch_bar .input-group-addon {
        margin: 0 0 0 -27px;
    }

    .inbox_chat {
        height: 550px;
        overflow-y: scroll;
    }

    .chat_list {
        cursor: pointer;
    }

    .active_chat, .chat_list:hover {
        background: #ebebeb;
    }

    .chat_people {
        overflow: hidden;
        clear: both;
    }

    .chat_img {
        float: left;
        width: 11%;
    }

    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }
</style>
