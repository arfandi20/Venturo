<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TES - Venturo Camp Tahap 2 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mt-3">
        <div class="card mt-3 " style="width: 100%;">
            <div class="card-header mb-3">
                <p>Venturo - laporan penjualan tahunan per menu</p>
            </div>
            <div class="card-body">
                <form action="{{ url('tahun') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <select id="" class="form-control" name="tahun">
                                    <option value="" selected="">Pilih Tahun</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">
                                Tampilkan
                            </button>
                        </div>
                    </div>
                </form>
                @isset($tahun)
                <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="penjualan">
                            <thead>
                                <tr class="table-dark">
                                    <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">
                                        Menu</th>
                                    <th colspan="12" style="text-align: center;">Periode Pada {{ $tahun }}</th>
                                    <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total
                                    </th>
                                </tr>
                                <tr class="table-dark">
                                    <th style="text-align: center;width: 50px;">Jan</th>
                                    <th style="text-align: center;width: 50px;">Feb</th>
                                    <th style="text-align: center;width: 50px;">Mar</th>
                                    <th style="text-align: center;width: 50px;">Apr</th>
                                    <th style="text-align: center;width: 50px;">Mei</th>
                                    <th style="text-align: center;width: 50px;">Jun</th>
                                    <th style="text-align: center;width: 50px;">Jul</th>
                                    <th style="text-align: center;width: 50px;">Ags</th>
                                    <th style="text-align: center;width: 50px;">Sep</th>
                                    <th style="text-align: center;width: 50px;">Okt</th>
                                    <th style="text-align: center;width: 50px;">Nov</th>
                                    <th style="text-align: center;width: 50px;">Des</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-success" id="kategori" colspan="14"><b>Makanan</b></td>
                                </tr>

                                @foreach ($menu_ as $item)
                                    @if ($item->kategori == 'makanan')
                                        <tr>
                                            <td>{{ $item->menu }}</td>
                                            @for ($i = 1; $i <= 12; $i++)
                                                @if ($result[$item->menu][$i] == 0)
                                                    <td class="text-end">-</td>
                                                @else
                                                    <td class="text-end">{{ number_format($result[$item->menu][$i], 0, ',', '.') }}</td>
                                                @endif
                                            @endfor
                                            <td class="fw-bold text-end">
                                                {{ number_format($jumlahmenu[$item->menu], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                <tr>
                                    <td class="table-success" id="kategori" colspan="14"><b>Minuman</b></td>
                                </tr>

                                @foreach ($menu_ as $item)
                                    @if ($item->kategori == 'minuman')
                                        <tr class="">
                                            <td>{{ $item->menu }}</td>
                                            @for ($i = 1; $i <= 12; $i++)
                                                @if ($result[$item->menu][$i] == 0)
                                                    <td class="text-end">-</td>
                                                @else
                                                    <td class="text-end">{{ number_format($result[$item->menu][$i], 0, ',', '.') }}</td>
                                                @endif
                                            @endfor
                                            <td class="fw-bold text-end">
                                                {{ number_format($jumlahmenu[$item->menu], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                            <tfoot class="table-dark">
                                <tr>
                                    <td class="fw-bold">Total</td>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <td class="fw-bold text-end">{{ number_format($jumlah[$i], 0, ',', '.') }}</td>
                                    @endfor
                                    <td class="fw-bold text-end">{{ number_format($nilai, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    @endisset
                </div>
            </div>               
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('api.js') }}"></script>
</body>
</html>