@extends('backend.layouts.app')

@section('content')
<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">{{ $module }}</h4>
    </div>
</div>
@include('backend.includes.alert-message')
<div class="row">
    <!-- Menu Form -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="bg-light p-2 mt-0 mb-2">Manage Menu Items</h5>
                <form method="post" id="menu-form" action="{{route('menu.store')}}" class="form">
                    @csrf
                    <input type="hidden" name="id" id="menu-id">

                    <div class="mb-2 form-group">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control form-control-sm" required>
                    </div>

                    <div class="mb-2 form-group">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" name="url" id="url" class="form-control form-control-sm">
                    </div>

                    <div class="mb-2 form-group">
                        <label for="icon" class="form-label">Icon (Class)</label>
                        <input type="text" name="icon" id="icon" class="form-control form-control-sm" placeholder="e.g., ti ti-home">
                    </div>

                    <div class="mb-2 form-group">
                        <label for="target" class="form-label">Target</label>
                        <select name="target" id="target" class="form-control form-control-sm">
                            <option value="_self">Same Tab</option>
                            <option value="_blank">New Tab</option>
                        </select>
                    </div>                    

                    <input type="hidden" name="parent_id" id="parent_id">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-sm">Add to Menu</button>
                    </div>
                </form>                
            </div>
        </div>            
    </div>
    
    <!-- Menu Manage -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="bg-light p-2 mt-0 mb-2">Menu Structure</h5>
                <div class="dd" id="nestable"></div>
                <button class="btn btn-success mt-3" id="save-order">Save Menu</button>
            </div>
        </div>            
    </div>
</div>

<!-- Nestable CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nestable2@1.6.0/jquery.nestable.min.css">
<script src="https://cdn.jsdelivr.net/npm/nestable2@1.6.0/jquery.nestable.min.js"></script>

<!-- Custom CSS -->
<style>
.item-actions {
    position: absolute;
    right: 5px;
    top: 10px;
}   

.dd-handle {
    cursor: move;
}

.dd-handle {
    cursor: move;
    padding: 10px 10px;
    height: 40px;
}

.dd-item>button {
    top: 6px;
}
</style>

<!-- Menu JS -->
<script defer>
    initValidate('.form');

    const renderMenu = (items) => {
        const buildList = (items) => {
            let html = '<ol class="dd-list">';
            items.forEach(item => {
                html += `<li class="dd-item" data-id="${item.id}">
                    <div class="menu-box">
                        <div class="dd-handle">${item.title}</div>
                        <div class="item-actions">
                            <a href="javascript:void(0);" class="link-reset fs-20 p-0 edit" 
                                data-id="${item.id}" 
                                data-title="${item.title}" 
                                data-url="${item.url}" 
                                data-parent="${item.parent_id}"
                                data-icon="${item.icon ?? ''}"
                                data-target="${item.target ?? '_self'}">
                                <i class="ti ti-pencil"></i>
                            </a>
                            <a href="javascript:void(0);" class="link-reset fs-20 p-0 delete" 
                                data-id="${item.id}">
                                <i class="ti ti-trash"></i>
                            </a>
                        </div>
                    </div>`;
                if (item.children && item.children.length > 0) {
                    html += buildList(item.children);
                }
                html += '</li>';
            });
            html += '</ol>';
            return html;
        };

        $('#nestable').html(buildList(buildHierarchy(items)));
        $('#nestable').nestable({ maxDepth: 10 });
    };

    const buildHierarchy = (flat) => {
        const map = {};
        flat.forEach(item => map[item.id] = { ...item, children: [] });
        const tree = [];
        flat.forEach(item => {
            if (item.parent_id && map[item.parent_id]) {
                map[item.parent_id].children.push(map[item.id]);
            } else {
                tree.push(map[item.id]);
            }
        });
        return tree;
    };

    $(function () {
        let menus = @json($menus);
        renderMenu(menus);

        // $('#menu-form').on('submit', function (e) {
        //     e.preventDefault();
        //     $.post("{{ route('menu.store') }}", $(this).serialize(), function () {
        //         location.reload();
        //     });
        // });

        $(document).on('click', '.edit', function () {
            $('#menu-id').val($(this).data('id'));
            $('#title').val($(this).data('title'));
            $('#url').val($(this).data('url'));
            $('#parent_id').val($(this).data('parent'));
            $('#icon').val($(this).data('icon'));
            $('#target').val($(this).data('target'));
        });

        $(document).on('click', '.delete', function () {
            if (!confirm('Delete this menu item?')) return;
            $.ajax({
                url: '/backend/menu/' + $(this).data('id'),
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function () {
                    location.reload();
                }
            });
        });

        $('#save-order').on('click', function () {
            let order = $('#nestable').nestable('serialize');
            $.post("{{ route('backend.menu.updateOrder') }}", {
                _token: '{{ csrf_token() }}',
                menu: order
            }, function () {
                alert('Order saved!');
            });
        });
    });
</script>
@endsection
