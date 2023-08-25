<!DOCTYPE html>
<html>
<head>
    <title>Pet Azuke Places</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        .pet-azuke-places {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .place-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .place-name {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .place-description {
            color: #666;
        }
        .logout-button {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 1000px;
        }

        .logout-button:hover {
            background-color: #c9302c;
        }
        .pet-hotel-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .pet-hotel-item {
            width: 500px;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .pet-hotel-item img {
            max-width: 100%;
            height: auto;
        }

        .pet-hotel-item h3 {
            margin-top: 10px;
            font-size: 16px;
        }

    </style>
</head>
<body>
    <div class="header">
        <h1>Pet Azuke Places</h1>
        <div class="logout-button-container">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>
    <div class="pet-azuke-places">
        <div class="pet-hotel-list">
            @foreach ($petAzukePlaces as $place)
                <div class="place-item">
                    <h2 class="place-name"><a href="{{ route('getPetAzukePlace', ['place_id' => $place->id]) }}">{{ $place->place_name }}</a></h2>
                    <div class="pet-hotel-item">
                        <img src="{{ url('storage/img/img1.jpeg') }}" alt="{{ $place->place_name }}" class="place-image">
                    </div>   
                        <p class="place-price">{{ $place->price }} 円/日</p>
                        <p class="place-description">{{ $place->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
