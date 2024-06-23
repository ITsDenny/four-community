@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Tgl Lahir</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->nik }}</td>
                                    <td>{{ $member->gender === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                    <td>{{ $member->birth_date }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" {{ $member->status ? 'checked' : '' }} disabled>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

</main>

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 34px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 20px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(14px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 20px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>
@include('partial.footer')
