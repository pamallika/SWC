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
        return {
            isSubscriber: false,
            isCreator: this.event.user_id === this.user.id,
        }
    },
    mounted() {
        if (this.event.length !== 0) {
            this.setIsSubscriber()
        }
    },
    computed: {
        isSubscriber: function () {
            return this.isSubscriber;
        },
        isCreator: function () {
            return this.isCreator;
        },
    },

    methods: {
        setIsSubscriber() {
            this.event.subscribers.forEach(subscriber => {
                if (subscriber.id === this.user.id) {
                    this.isSubscriber = true;
                }
            })
        },
        async showSubscriber(subscriber) {
            let response = 'Имя: ' + subscriber.first_name + '  Фамилия: ' + subscriber.last_name + '  Зарегистрирован с: ' +  new Date(subscriber.created_at).toDateString();
            alert(response)
            console.log(subscriber.first_name);
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
