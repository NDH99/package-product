<?php

return [

    /*
    |-----------------------------------------------------------------------
    | MAIN MENU
    |-----------------------------------------------------------------------
    | Top menu
    |
    */
    'menus' => [
        'top-menu' => 'Product'
    ],





    /*
    |-----------------------------------------------------------------------
    | SIDEBAR
    |-----------------------------------------------------------------------
    | Left side bar
    |
    |
    |
    */
    'sidebar' => [
        'list' => 'Items',
        'add' => 'Add new',
        'trash' => 'Trash',
        'config' => 'Configurations',
        'lang' => 'Languages',
    ],





    /*
    |-----------------------------------------------------------------------
    | Table column
    |-----------------------------------------------------------------------
    | The list of columns in table
    |
    */
    'columns' => [
        'order' => '#',
        'name' => 'Product name',
        'operations' => 'Operations',
        'updated_at' => 'Updated at',
        'filename' => 'File name',
    ],


    /*
    |-----------------------------------------------------------------------
    | Pages
    |-----------------------------------------------------------------------
    | Pages
    |
    */
    'pages' => [
        'title-list' => 'List of product',
        'title-list-search' => 'Search results',
        'title-edit' => 'Edit Product',
        'title-add' => 'Add new Product',
        'title-delete' => 'Delete Product',
        'title-config' => 'Current configurations',
        'title-lang' => 'Manage languages',
    ],





    /*
    |-----------------------------------------------------------------------
    | Button
    |-----------------------------------------------------------------------
    | The list of buttons
    |
    */
    'buttons' => [
        'search' => 'Search',
        'reset' => 'Resest',
        'add' => 'Add',
        'save' => 'Save',
        'delete' => 'Delete',
    ],





    /*
    |-----------------------------------------------------------------------
    | Form
    |-----------------------------------------------------------------------
    | The list of elements in form
    |
    |
    */
    'form' => [
        'keyword' => 'Keyword',
        'sorting' => 'Sorting',
        'no-selected' => 'No selected',
        'status' => 'Status',
    ],





    /*
    |-----------------------------------------------------------------------
    | Description
    |-----------------------------------------------------------------------
    | Description
    |
    */
    'description' => [
        'form' => 'Product form',
        'update' => 'Update Product',
        'name' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'category' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'list' => 'List of items',
        'counters' => 'There are <b>:number</b> items',
        'counter' => 'There is <b>:number</b> item',
        'not-found' => 'Not found items',
        'config' => 'List of configurations',
        'lang' => 'List of languages',
    ],



    /*
    |-----------------------------------------------------------------------
    | Error
    |-----------------------------------------------------------------------
    | Show error message
    |
    |
    |
    */
    'errors' => [
        'required' => ':attribute is required',
        'required_length' => 'Allow from: <b>:minlength</b> to <b>:maxlength</b>. characters',
    ],




    /*
    |-----------------------------------------------------------------------
    | FIELDS
    |-----------------------------------------------------------------------
    | Column name in table
    |
    |
    |
    */
    'fields' => [
        'id' => 'Product ID',
        'name' => 'Product name',
        'description' => 'Description',
        'overview' => 'Overview',
        'slug' => 'Slug',
        'updated_at' => 'Updated at'
    ],




    /*
    |-----------------------------------------------------------------------
    | LABLES
    |-----------------------------------------------------------------------
    | The lables of element in form
    |
    |
    |
    */
    'labels' => [
        'name' => 'Product name',
        'category' => 'Category name',
        'title-search' => 'Search Product',
        'title-backup' => 'Backups',
        'config' => 'Configurations',
    ],





    /*
    |-----------------------------------------------------------------------
    | TABS
    |-----------------------------------------------------------------------
    | The name of tab
    |
    |
    |
      */
    'tabs' => [
        'menu_1' => 'Basic',
        'menu_2' => 'Advance',
        'menu_3' => 'Other',
        'menu_4' => 'Other',
        'menu_5' => 'Other',
        'menu_6' => 'Other',
        'menu_7' => 'Other',
    ],





    /*
    |-----------------------------------------------------------------------
    | HEADING
    |-----------------------------------------------------------------------
    |
    |
    |
    |
    */
    'headings' => [
        'form-search' => 'Search product',
        'list' => 'List of product',
        'search' => 'Search results',
    ],





    /*
    |-----------------------------------------------------------------------
    | CONFIRMS
    |-----------------------------------------------------------------------
    | List of messages for confirm
    |
    |
    |
    */
    'confirms' => [
        'delete' => 'Are you sure you want to delete this item?',
    ],





    /*
    |-----------------------------------------------------------------------
    | ACTIONS
    |-----------------------------------------------------------------------
    |
    |
    |
    |
    */
    'actions' => [
        'add-ok' => 'Add item successfully',
        'add-error' => 'Add item failed',
        'edit-ok' => 'Edit item successfully',
        'edit-error' => 'Edit item failed',
        'delete-ok' => 'Delete item successfully',
        'delete-error' => 'Delete item failed',
        'find-not' => 'Find not product ',
    ],
];