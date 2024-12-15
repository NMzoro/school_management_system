@extends('layouts.master')
@section('title','Product')
@section('content')
<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
  
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main>
            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                <div class="w-full mb-1">
                    <div class="mb-4">
                        <nav class="flex mb-5" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                                <li class="inline-flex items-center">
                                  <a href="#" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                    Home
                                  </a>
                                </li>
                                <li>
                                  <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="#" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Users</a>
                                  </div>
                                </li>
                                <li>
                                  <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Settings</span>
                                  </div>
                                </li>
                              </ol>
                        </nav>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Users List</h1>
                    </div>
                    <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                        <div class="flex items-center mb-4 sm:mb-0">
                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                <button id="btn-student" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white btn-toggle">
                                    <img src="{{asset('icon/student.png')}}" alt="">
                                  Student
                                </button>
                                <button id="btn-admin" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white btn-toggle ">
                                    <img src="{{asset('icon/admin.png')}}" alt="">
                                  Administrateur
                                </button>
                                <button id="btn-teacher" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white btn-toggle">
                                    <img src="{{asset('icon/professeur.png')}}" alt="">
                                  Professeur
                                </button>
                              </div>
                        </div>
                        <button id="createProductButton" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
                            Add New Users
                        </button>
                    </div>
                    <!-- Conteneurs de selects cachés au départ -->
                    <div id="admin-selects" class="hidden">
                        <x-select-admin/>
                    </div>
                    <div id="students-selects" class="hidden">
                        <x-select-student/>
                    </div>
                    <div id="teachers-selects" class="hidden">
                        <x-select-professeur/>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <div id="table-student" class="table-content">
                                <table class=" min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                    <x-student-list/>
                                </table>
                            </div>
                            <div id="table-admin" class="table-content hidden">
                                <table id="table-admin" class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                    <x-admin-list/>
                                </table>
                            </div>
                            <div id="table-teacher" class="table-content hidden">
                                <table id="table-teacher" class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                    <x-professeur-list/>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.btn-toggle');
        const tables = document.querySelectorAll('.table-content');
        const adminSelects = document.getElementById('admin-selects'); 
        const studentsSelects = document.getElementById('students-selects'); 
        const teachersSelects = document.getElementById('teachers-selects'); 

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                // Masquer toutes les tables
                tables.forEach((table) => {
                    table.classList.add('hidden', 'opacity-0');
                    table.classList.remove('fade-in');
                });

                // Afficher la table associée au bouton
                const targetId = button.id.replace('btn-', 'table-');
                const targetTable = document.getElementById(targetId);

                if (targetTable) {
                    targetTable.classList.remove('hidden', 'opacity-0');
                    targetTable.classList.add('fade-in');
                }

                // Afficher ou masquer les selects en fonction du bouton
                if (button.id === 'btn-admin') {
                    adminSelects.classList.remove('hidden');
                    studentsSelects.classList.add('hidden');
                    teachersSelects.classList.add('hidden');
                } else if (button.id === 'btn-student') {
                    studentsSelects.classList.remove('hidden');
                    adminSelects.classList.add('hidden');
                    teachersSelects.classList.add('hidden');
                } else if (button.id === 'btn-teacher') {
                    teachersSelects.classList.remove('hidden');
                    adminSelects.classList.add('hidden');
                    studentsSelects.classList.add('hidden');
                }
            });
        });
    });
</script>


<style>
    /* Animation Fade In */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
