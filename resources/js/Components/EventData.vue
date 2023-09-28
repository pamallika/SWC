<template>
    <div>
        <div>
            <h3>{{ event.title }}</h3>
            <h4> {{ event.descr }}</h4>
            <h4> {{ new Date(event.created_at).toDateString() }}</h4>
        </div>
        <div>
            <h3>Участники</h3>
            <div class="subscribers" v-for="subscriber in event.subscribers" >
                <a v-on:click="showSubscriber(subscriber)">{{subscriber.first_name}} {{subscriber.last_name}}</a>
            </div>
        </div>
        <div>
            <button v-if="isCreator">Удалить</button>
            <button v-else-if="isSubscriber">Отказаться от участия</button>
            <button v-else>Принять участие</button>
        </div>

    </div>
</template>

<script>


import {defineComponent} from "vue";
export default defineComponent({
    props: {
        event: Object,
        user: Object
    },
    data() {
    },
    mounted() {
    },
    computed: {
        isShow : function () {
            return this.event.length > 0;
        },
        isSubscriber: function () {
            return this.setIsSubscriber();
        },
        isCreator: function () {
            return this.setIsCreator();
        },
    },

    methods: {
        setIsSubscriber() {
            if (this.event !== []) {
                this.event.subscribers.forEach((subscriber) => {
                    return subscriber.pivot.user_id === this.user.id
                })
            }
            return false;
        },
        setIsCreator() {
            return this.event.user_id === this.user.id
        },
        async showSubscriber(subscriber) {
            let response = 'Имя: ' + subscriber.first_name + '  Фамилия: ' + subscriber.last_name + '  Зарегистрирован с: ' +  new Date(subscriber.created_at).toDateString();
            alert(response)
        }


    }

})
</script>
<style>
.subscribers {
    margin: 1rem 0;
}
a {
    cursor: pointer;
}
</style>
