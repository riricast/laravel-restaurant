<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Hello World!</h1>

    <p>This is a test paragraph to test if everything is working.</p>

    <table>
        <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
        </tr>
        @foreach($customerData as $custData)
            <tr>
                <td>{{ $custData->cust_id }}</td>
                <td>{{ $custData->cust_name }}</td>
                <td>{{ $custData->cust_address }}</td>
            </tr>
        @endforeach
    
    </table>

     <form>
            <label>Custoemr Name</label> <br>
            <input type="text" id="custName" name="cust_name">
            <br>
            <label>Customer Address</label> <br>
            <input type="text" id="custAdd" name="cust_address">
        </form>
</body>
</html>