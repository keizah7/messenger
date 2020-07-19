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
            <div class="chat_list active_chat" v-for="contact in contacts" v-if="contacts">
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

        props: {
            contacts: {
                type: Array,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
