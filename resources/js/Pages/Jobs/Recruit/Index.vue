<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps({
  jobposts: {
    type: Object,
    default: () => ({}),
  },
  can: {
    type: Object,
    default: () => ({}),
  },
  OtherData: {
    type: Object,
    default: () => ({}),
  },
});
console.log(JSON.stringify(props));
</script>
<template>
    <Head title="Recruit" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Recruit
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex bg-gray-800 justify-between items=center p-5">
                        <div class="flex space-x-2 items-center text-white">
                            Upload candidate excel sheet for recruitment purpose!!!
                        </div>
                        <div class="flex space-x-2 items-center" v-if="can.create">
                            <a href="#" class="px-4 py-2 bg-green-500 uppercase text-white rounded focus:outline-none flex items-center"><span class="iconify mr-1" data-icon="gridicons:create" data-inline="false"></span> Create Role</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">Name</th>
                                <th v-if="can.upload || can.edit || can.delete" scope="col" class="py-3 px-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="jobpost in jobposts.data" :key="jobpost.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td data-label="Name" class="py-4 px-6">
                                    {{ jobpost.title }}
                                </td>
                                <td
                                    v-if="can.upload || can.edit || can.delete"
                                    class="py-4 px-6"
                                >
                                    <div type="justify-start lg:justify-end" no-wrap>
                                         <BreezeButton class="ml-4 bg-green-500 px-2 py-1 rounded text-white cursor-pointer" v-if="can.upload">
                                            Upload Data
                                        </BreezeButton>
                                        <BreezeButton class="ml-4 bg-green-500 px-2 py-1 rounded text-white cursor-pointer" v-if="can.edit">
                                            Edit
                                        </BreezeButton>
                                        <BreezeButton class="ml-4 bg-red-500 px-2 py-1 rounded text-white cursor-pointer" v-if="can.delete">
                                            Delete
                                        </BreezeButton>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
