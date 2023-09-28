<template>
    <div class="event-item" v-for="event in events">
        <EventMin v-on:click="focusEvent(event)" :event="event"></EventMin>
    </div>
</template>
<script>

import {defineComponent} from "vue";
import EventMin from "@/Components/EventMin.vue";

export default defineComponent({
    components: {EventMin},
    props: {
        events: Array
    },
    methods: {
        focusEvent(event) {
            this.$emit('focusEvent', event);
        }
    }
})
</script>

<style>
    .event-item{
        display: flex;
        border: 1px black solid;
        max-width: 20vw;
        padding: .25em;
    }
</style>
