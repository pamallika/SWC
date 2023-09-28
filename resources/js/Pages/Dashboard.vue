<script setup>
import {Head, Link} from '@inertiajs/vue3';
import EventList from "@/Components/EventList.vue";
import EventData from "@/Components/EventData.vue";
</script>

<template>
    <Head title="Dashboard" />
    <Link
        :href="route('logout')"
        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
    >Выйти</Link
    >
    <div class="content">
        <div class="left-sidebar">
            <div class="event-list all-event-list">
                <h2>Все события</h2>
                <EventList v-on:focusEvent="changeEvent" :events="events"></EventList>
            </div>
            <div class="event-list user-event-list">
                <h2>Мои события</h2>
                <EventList v-on:focusEvent="changeEvent" :events="user.events"></EventList>
            </div>
        </div>
        <div class="main">
            <EventData v-if="user" v-bind:event="event" :user="user"></EventData>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            events: [],
            user: [],
            errors: [],
            event: [],
            pingerId: 0,
        }
    },
    mounted() {
        this.getEvents();
        this.getUser();
    },
    methods: {
        changeEvent(event) {
            console.log('change', event);
            this.event = event
        },
        showError(error) {
            alert(error);
        },
        async getEvents() {
            const responseEvents = await fetch('/events');
            const resultEvents = await responseEvents.json();
            if (resultEvents['error'] !== null) {
                this.showError(resultEvents['error']);
            }
            this.events = resultEvents['result'];
            if (this.events.length > 0) {
                this.event = resultEvents['result'][0];
            }
        },
        async getUser() {
            const responseUser = await fetch('/users/me');
            const resultUser = await responseUser.json();
            if (resultUser['error'] !== null) {
                this.showError(resultUser['error']);
            }
            this.user = resultUser['result'];
        },
        async getEvent(){
            if (this.events.length > 0) {
                const responseEvent = await fetch('/events/' + this.event.id);
                const resultEvent = await responseEvent.json();
                if (resultEvent['error'] !== null) {
                    this.showError(resultEvent['error']);
                }
                this.event = resultEvent['result'];
            }
        }
    },
    created() {
        this.pingerId =setInterval(this.getEvent, 30000);
    },
    beforeUnmount() {
        clearInterval(this.pingerId);
    }
}
</script>
<style>
.content{
    display: flex;
    padding: 0 1rem;
    margin: 1rem;
    border: 1px black solid;
}
.event-list .main{
    min-height: 10vh;
    margin: 10rem 0;
    padding: 0 1rem;
}
.left-sidebar {
    display: flex;
    flex-direction: column;
    max-width: 25vw;
}
.main {
    margin-left: 2rem;
}
</style>
