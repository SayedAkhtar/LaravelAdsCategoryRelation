<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ads Test</title>
</head>
<body>
    <ul>
        @foreach ($ads as $ad)
            <li>
                <span>{{ $ad->name}} ({{ $ad->category->count() }})<span>
                    <ul>
                        @foreach ($ad->category as $cat)
                            <li>{{ $cat->name }} ( {{$cat->sub_category->count()}} )
                                <ul>
                                    @foreach ( $cat->sub_category as $sub_cat)
                                        <li>{{ $sub_cat->name }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>