
# CMS Guide For Developer
###

This CMS was developed full modular this file explains how to use some logic code to save the accretion's code base.
This file contains some codes to use as structure and explain some logic code for better understanding.
###

- To Learn More about Markdown, please Visit This Site [Markdown](https://www.markdownguide.org/basic-syntax/#code) .

---

### Media Morph Relationship

     if ($request->has('image_input')) {
        $image_input = Media::register($request->image_input);
        //
        $newModelInstance->MorphRelationshipMethod()->save($image_input);

        OR

        $newModelInstance->MorphRelationshipMethod()->saveMany($image_input);
     }

---

### Blade Structure

    @extends('dashboard::layouts.master')


    @section('css')
        <style>
    
        </style>
    @stop
    
    
    @section('content')

    @stop
    
    
    @section('js')
        <script type="text/javascript">
        
        </script>
    @stop

---

### Admin Panel jQuery Vendors

     <script type="text/javascript">

        // File Uploader
        $('.main-category-image').dropify({
            messages: {
                'default': '<div><p style="font-size: 14px">عکس را بکشید و رها کنید یا کلیک کنید</p></div>',
                'replace': '<div><p style="font-size: 14px">فایل را بکشید و رها کنید یا کلیک کنید</p></div>',
                'remove':  '<i class="mdi mdi-delete-forever right" style="color: #F44336; padding: 5px 5px 5px 20px; font-size: 2rem"></i>',
                'error':   'در بارگذاری فایل، اشکالی پیش آمده!'
            },
        });

        ======================================
    
        // Chips
        $('.category-chips').chips({
            placeholder: 'کلمات کلیدی',
            limit: 10,
        });

        ======================================

        // Convert Chips to String on Form Submit
        $('#create-new-category').on('submit', null, null, function (event) {
            event.preventDefault();
            let categoryChips = [];
            //
            $('#category-keywords .chip').map((item, chip) => {
                categoryChips.push( $(chip).text() );

                return categoryChips;
            });
            //
            $('#category-meta-tag-keywords').val( categoryChips.join(', ').toString() );
            //
            return this.submit();
        });

        ======================================

        // JSTree with search
        $(".searchable-js-tree").jstree({
            plugins: ['search'],
        });


        let to = false;
        $('.search-category').keyup(function () {
            if (to) {
                clearTimeout(to);
            }

            to = setTimeout( () => {
                let v = $('.search-category').val();
                $('.searchable-js-tree').jstree(true).search(v);
            }, 250);
        });

        ======================================

        // Select Box
        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%',
            language: 'fa',
            dir: 'rtl',
        });
    </script>

---

### Toast Message Alert (Server Error) 

    <script type="text/javascript">
        let toastHTMLs = [];

        @if($errors->any())
            @foreach($errors->all() as $error)
                toastHTMLs.push('<span style="font-size: 14px">{{ $error }}</span>');
            @endforeach
        @endif

        if (0 < toastHTMLs.length) {
            toastHTMLs.map(error => {
                M.toast({
                    html: error,
                    classes: 'red',
                    activationPercent: 0.5,
                    outDuration: 400,
                    inDuration: 350,
                    displayLength: 3000
                });
            });
        }
    </script>


### Pages Custom Header

    <div class="flex justify-between py-6 px-3 bg-white shadow-md ">
        <ul id="custom-page-header-nav-items" class="">
            <li><a class="" href="javascript:void(0)">تور آموزشی</a></li>
        </ul>

        <div><h1 class="inline-block text-lg"> افزودن برچسب </h1><i class="mdi mdi-rename-box inline-block text-lg"></i></div>
    </div>


### RTL Input
    
    <div class="relative mb-3 ml-3"
                 data-te-input-wrapper-init
                 data-te-class-notch="group flex flex-row-reverse absolute right-0 top-0 w-full max-w-full h-full text-right pointer-events-none"
                 data-te-class-notch-leading="pointer-events-none border border-solid box-border bg-transparent transition-all duration-200 ease-linear motion-reduce:transition-none left-0 top-0 h-full w-2 border-l-0 rounded-r-[0.25rem] group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 border-neutral-300 dark:border-neutral-600 group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
                 data-te-class-notch-trailing="pointer-events-none border border-solid box-border bg-transparent transition-all duration-200 ease-linear motion-reduce:transition-none grow h-full border-r-0 rounded-l-[0.25rem] group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 border-neutral-300 dark:border-neutral-600 group-data-[te-input-focused]:shadow-[_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
                >
            <input
                type="text"
                class="text-right peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="name"
                placeholder="نام"
            /> <label
                for="name"
                class="pointer-events-none absolute right-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:right-2 peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
            >نام </label>
    </div>


### RTL Textarea

    <div class="relative mb-3"
                 data-te-input-wrapper-init
                 data-te-class-notch="group flex flex-row-reverse absolute right-0 top-0 w-full max-w-full h-full text-right pointer-events-none"
                 data-te-class-notch-leading="pointer-events-none border border-solid box-border bg-transparent transition-all duration-200 ease-linear motion-reduce:transition-none left-0 top-0 h-full w-2 border-l-0 rounded-r-[0.25rem] group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 border-neutral-300 dark:border-neutral-600 group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
                 data-te-class-notch-trailing="pointer-events-none border border-solid box-border bg-transparent transition-all duration-200 ease-linear motion-reduce:transition-none grow h-full border-r-0 rounded-l-[0.25rem] group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 border-neutral-300 dark:border-neutral-600 group-data-[te-input-focused]:shadow-[_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
            >
            <textarea class="peer block min-h-[auto] w-full text-right rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                      id="short-description"
                      name="short_description"
                      rows="7"
                      placeholder="توضیحات کوتاه"
            ></textarea> <label for="short-description"
                                class="pointer-events-none absolute right-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:right-0 peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
            > توضیحات کوتاه </label>
    </div>

### RTL Checkbox

    <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem] mx-3">
            <label
                class="relative float-left inline-block mt-[0.2rem] pl-[0.15rem] hover:cursor-pointer"
                for="active"
            > فعال </label>
            <input
                class="relative inline-block float-right ml-[0.5rem] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                type="checkbox"
                value=""
                id="active"
                checked
            />
    </div>
