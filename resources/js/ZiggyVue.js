import route from '../../vendor/tightenco/ziggy/dist/index.m'

export const ZiggyVue = {
  install: (v, options) => {
    const r = (name, params, absolute, config = options) => route(name, params, absolute, config)

    window.route = r

    v.mixin({
      methods: {
        route: r,
      },
    })

    v.provide('route', r)
  },
}
