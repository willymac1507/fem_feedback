import {defineStore} from 'pinia'

export const useFilterStore = defineStore('filter', () => ({
    activeFilter: 'All',
}))
