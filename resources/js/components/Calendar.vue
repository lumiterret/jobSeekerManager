<template>    <div class="calendar-parent">
    <calendar-view
        :items="items"
        :locale="locale"
        :show-date="showDate"
        :time-format-options="{ hour: 'numeric', minute: '2-digit' }"
        :show-times="showTimes"
        :class="themeClasses"
        :date-classes="myDateClasses"
        :display-period-uom="displayPeriodUom"
        :display-period-count="displayPeriodCount"
        :starting-day-of-week="startingDayOfWeek"
        :enable-date-selection="true"
        @click-date="onClickDay"
        @click-item="onClickItem"
    >
        <template #header="{ headerProps }">
            <calendar-view-header slot="header" :header-props="headerProps" @input="setShowDate" />
        </template>
    </calendar-view>
</div>
</template>

<script>
import { CalendarView, CalendarViewHeader } from "vue-simple-calendar"

import "vue-simple-calendar/dist/style.css"
// The next two lines are optional themes
import "vue-simple-calendar/dist/css/default.css"
export default {
    name: "Calendar",

    data: function() {
        return {
            showDate: new Date(),
            startingDayOfWeek: 1,
            showTimes: true,
            useDefaultTheme: true,
            useHolidayTheme: true,
            displayPeriodUom: "month",
            displayPeriodCount: 1,
            locale: "Ru",
            items: [
                {
                    id: "34",
                    startDate: this.thisMonth(20),
                    title: "Собеседование",
                    classes: "o",
                    url: "https://en.wikipedia.org/wiki/Birthday",
                },
                {
                    id: "56",
                    startDate: this.thisMonth(29),
                    title: "Same day 2",
                    class: "g",
                },
            ]
        }
    },
    components: {
        CalendarView,
        CalendarViewHeader,
    },
    computed: {
        themeClasses() {
            return {
                "theme-default": this.useDefaultTheme,
            }
        },
        myDateClasses() {
            const o = {
                ides: new Date().getDate() === 1,
            };
            return o;
        },
    },
    methods: {
        setShowDate(d) {
            this.showDate = d;
        },
        thisMonth(d, h, m) {
            const t = new Date()
            return new Date(t.getFullYear(), t.getMonth(), d, h || 0, m || 0)
        },
        onClickDay(d) {
            console.log(`You clicked day: ${d.toLocaleDateString()}`);
            this.message = `You clicked day: ${d.toLocaleDateString()}`
        },
        onClickItem(e) {
            console.log(`You clicked event: ${e.title}`);
            console.log(this.thisMonth(20));
            this.message = `You clicked event: ${e.title}`
        },
    }
}
</script>

<style scoped>

</style>
