<h1>
    Cars report
</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Reg number</th>
            <th>Owner name</th>
            <th>Region name</th>
            <th>Brand name</th>
            <th>Model name</th>
            <th>Transmission name</th>
            <th>Road accidents count</th>
            <th>Fines count</th>
            <th>Last service at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            <tr>
                <td>
                    {{ $car->id }}
                </td>
                <td>
                    {{ $car->reg_number }}
                </td>
                <td>
                    {{ $car->owner_name }}
                </td>
                <td>
                    {{ $car->region_name }}
                </td>
                <td>
                    {{ $car->brand_name }}
                </td>
                <td>
                    {{ $car->model_name }}
                </td>
                <td>
                    {{ $car->transmision_name }}
                </td>
                <td>
                    {{ $car->road_accidents_count }}
                </td>
                <td>
                    {{ $car->fines_count }}
                </td>
                <td>
                    {{ $car->last_service_at }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>