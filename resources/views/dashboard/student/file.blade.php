
<div style="
margin:0;
display:flex;
justify-content:center;
align-item: center;
">
    <table class="table table-striped table-sm">
        <thead>
            <h6 style="margin: 5px;"><b> Name: </b>{{ Auth::user()->first_name . ' ' . Auth::user()->second_name }}</h6>

            <tr>
                <th scope="col">Note Type</th>
                <th scope="col">Course</th>
                <th scope="col">Note</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($results as $notes)
                <tr>
                    <td scope="col">{{ $notes->note_type }}</td>
                    <td scope="col">{{ $notes->course->name }}</td>
                    <td scope="col">{{ $notes->note }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

