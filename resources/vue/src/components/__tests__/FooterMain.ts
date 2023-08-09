import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import FooterMain from '../FooterMain.vue'

describe('Footer main', () => {
  it('renders properly', () => {
    const wrapper = mount(FooterMain)

    expect(wrapper.text()).toContain(new Date().getFullYear())
  })
})
