<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    @include('admin.layouts.navbar')
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        @include('admin.layouts.header')
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                @include('admin.layouts.header-main')
                <div class="card shadow border-0 mb-7">
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role ID</th>
                                    <th scope="col">PassWord</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Status ID</th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($users))
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>
                                                <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                            </td>
                                            <td>
                                                <a class="text-heading font-semibold" href="#">
                                                    {{$item->name}}
                                                </a>
                                            </td>
                                            <td>
                                                <a class="text-heading font-semibold" href="#">
                                                    {{$item->role_id}}
                                                </a>
                                            </td>
                                            <td>
                                                <a class="text-heading font-semibold" href="#">
                                                    {{$item->password}}
                                                </a>
                                            </td>
                                            <td>
                                                {{$item->address}}
                                            </td>
                                            <td>
                                                <a class="text-heading font-semibold" href="#">
                                                    {{$item->gender}}
                                                </a>
                                            </td>
                                            <td>
                                                {{$item->phonenumber}}
                                            </td>
                                            <td>
                                                {{$item->email}}
                                            </td>
                                            {{-- <td>
                                                1
                                            </td> --}}
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                                                <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>Không có người dùng</td>
                                    </tr>
                                @endif
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>