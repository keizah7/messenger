<template>
    <div class="type_msg">
        <div class="input_msg_write">
            <textarea placeholder="Type a message"
                      rows="2"
                      v-model="message"
                      @keydown.enter.prevent="sendMessage"></textarea>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ChatInput",

        data () {
            return {
                message: ''
            }
        },
        methods: {
            sendMessage () {
                if (this.message === '') return;

                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>

<style>
    textarea {
        width: 100%;
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
    }
</style>
