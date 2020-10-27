const PageA = {
  template: '<div>Page A</div>'
}

const PageB = {
  template: '<div>Page B</div>'
}

const routes  = [
  {path:'/a',component:PageA},
  {path:'/b',component:PageB}
]

const router = new VueRouter({
  mode: 'history',
  routes,
})


export default router