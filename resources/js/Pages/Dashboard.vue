<script setup>
import {Head} from '@inertiajs/vue3';
import EventList from "@/Components/EventList.vue";
import EventData from "@/Components/EventData.vue";
</script>

<template>
    <Head title="Dashboard" />
    <div class="content">
        <div class="left-sidebar">
            <div class="event-list all-event-list">
                <h2>Все события</h2>
                <EventList :events="events"></EventList>
            </div>
            <div class="event-list user-event-list">
                <h2>Мои события</h2>
                <EventList :events="events"></EventList>
            </div>
        </div>
        <div class="main">
            <EventData></EventData>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            events: []
        }
    },
    async mounted() {
        const res = (await fetch('http://127.0.0.1:8000/api/events'));
        this.events = await res.json();
    }
}
</script>
<style>
.left-sidebar{
    display: flex;
    flex-direction: column;
    margin: 1rem;
    border: 1px black solid;
    max-width: 25vw;
}
.event-list{
    min-height: 10vh;
    margin: 1rem 0;
    padding: 0 1rem;
}
</style>
