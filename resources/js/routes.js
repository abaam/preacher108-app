export default [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/students', component: require('./components/student/Student.vue').default },
    { path: '/student/tag', component: require('./components/student/Tag.vue').default },
    { path: '/student/category', component: require('./components/student/Category.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default },
    { path: '/events', component: require('./components/event/events.vue').default },
    { path: '/events/teacher', component: require('./components/event/eventsteacher.vue').default },
    { path: '/events/student', component: require('./components/event/eventsstudent.vue').default },
];
