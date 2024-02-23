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
        :periodChangedCallback="reload"
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
import "vue-simple-calendar/dist/css/default.css"
import moment from "moment-timezone"

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
            items: []
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
            // console.log(`You clicked day: ${d.toLocaleDateString()}`);
        },
        onClickItem(e) {
            window.location.href = '/appointments/'+ e.id;
        },
        async reload(e) {
            const params = {
                periodStart: e.value.periodStart.value,
                periodEnd: e.value.periodEnd.value
            },
            config = {
                params
            }

            this.items = await axios.get(`/appointments/events`, config).then(response => {
                return response.data;
            });
        },
    }
}
</script>

<style scoped>

</style>
