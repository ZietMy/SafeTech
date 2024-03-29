@extends('layouts.admin')
@section('content')
<div class="card shadow border-0 mb-7">
    <div class="card-header">
        <h2 class="mt-0">Order</h2>
        <div class=" text-sm-end">
            <div class="mx-n1">
                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                    <span class=" pe-2">
                        <i class="bi bi-plus"></i>
                    </span>
                    <span>Create</span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-nowrap">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Company</th>
                    <th scope="col">Offer</th>
                    <th scope="col">Meeting</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Robert Fox
                        </a>
                    </td>
                    <td>
                        Feb 15, 2021
                    </td>`
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-1.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Dribbble
                        </a>
                    </td>
                    <td>
                        $3.500
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-success"></i>Scheduled
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1610271340738-726e199f0258?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Darlene Robertson
                        </a>
                    </td>
                    <td>
                        Apr 15, 2021
                    </td>
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-2.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Netguru
                        </a>
                    </td>
                    <td>
                        $2.750
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-warning"></i>Postponed
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1610878722345-79c5eaf6a48c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Theresa Webb
                        </a>
                    </td>
                    <td>
                        Mar 20, 2021
                    </td>
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-3.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Figma
                        </a>
                    </td>
                    <td>
                        $4.200
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-success"></i>Scheduled
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1612422656768-d5e4ec31fac0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Kristin Watson
                        </a>
                    </td>
                    <td>
                        Feb 15, 2021
                    </td>
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-4.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Mailchimp
                        </a>
                    </td>
                    <td>
                        $3.500
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-dark"></i>Not discussed
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1608976328267-e673d3ec06ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Cody Fisher
                        </a>
                    </td>
                    <td>
                        Apr 10, 2021
                    </td>
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-5.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Webpixels
                        </a>
                    </td>
                    <td>
                        $1.500
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-danger"></i>Canceled
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Robert Fox
                        </a>
                    </td>
                    <td>
                        Feb 15, 2021
                    </td>
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-1.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Dribbble
                        </a>
                    </td>
                    <td>
                        $3.500
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-success"></i>Scheduled
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1610271340738-726e199f0258?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Darlene Robertson
                        </a>
                    </td>
                    <td>
                        Apr 15, 2021
                    </td>
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-2.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Netguru
                        </a>
                    </td>
                    <td>
                        $2.750
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-warning"></i>Postponed
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1610878722345-79c5eaf6a48c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Theresa Webb
                        </a>
                    </td>
                    <td>
                        Mar 20, 2021
                    </td>
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-3.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Figma
                        </a>
                    </td>
                    <td>
                        $4.200
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-success"></i>Scheduled
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1612422656768-d5e4ec31fac0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Kristin Watson
                        </a>
                    </td>
                    <td>
                        Feb 15, 2021
                    </td>
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-4.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Mailchimp
                        </a>
                    </td>
                    <td>
                        $3.500
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-dark"></i>Not discussed
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1608976328267-e673d3ec06ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            class="avatar avatar-sm rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Cody Fisher
                        </a>
                    </td>
                    <td>
                        Apr 10, 2021
                    </td>
                    <td>
                        <img alt="..."
                            src="https://preview.webpixels.io/web/img/other/logos/logo-5.png"
                            class="avatar avatar-xs rounded-circle me-2">
                        <a class="text-heading font-semibold" href="#">
                            Webpixels
                        </a>
                    </td>
                    <td>
                        $1.500
                    </td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-danger"></i>Canceled
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer border-0 py-5">
        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
    </div>
</div>
@endsection
