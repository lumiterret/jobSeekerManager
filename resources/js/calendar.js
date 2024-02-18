import { createApp } from "vue";
import Calendar from "./components/Calendar.vue";

const app = createApp({});

app.component('calendar', Calendar);
app.mount('#calendar')
