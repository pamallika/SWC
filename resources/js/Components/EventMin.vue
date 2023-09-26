<template>
    <div class="event">
        <span class="event-title"> {{event.title}} </span>
    </div>
</template>
<script>
export default {
    props: {
        event: String
    }
}
</script>
