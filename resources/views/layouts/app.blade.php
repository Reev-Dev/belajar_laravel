<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel SIoT</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="d-flex min-w-screen flex-col">
    <div class="app">
        <main class="d-flex min-w-screen min-h-screen flex-col">
            @include('partials.nav')
            @yield('content')
            @include('partials.footer')
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts &&
                new ApexCharts(document.getElementById("chart-visitors"), {
                    chart: {
                        type: "line",
                        fontFamily: "inherit",
                        height: 96,
                        sparkline: {
                            enabled: true,
                        },
                        animations: {
                            enabled: false,
                        },
                    },
                    stroke: {
                        width: [2, 1],
                        dashArray: [0, 3],
                        lineCap: "round",
                        curve: "smooth",
                    },
                    series: [{
                            name: "Visitors",
                            data: [
                                7687, 7543, 7545, 7543, 7635, 8140, 7810, 8315, 8379, 8441, 8485, 8227,
                                8906, 8561, 8333, 8551, 9305, 9647, 9359, 9840, 9805, 8612, 8970,
                                8097, 8070, 9829, 10545, 10754, 10270, 9282,
                            ],
                        },
                        {
                            name: "Visitors last month",
                            data: [
                                8630, 9389, 8427, 9669, 8736, 8261, 8037, 8922, 9758, 8592, 8976, 9459,
                                8125, 8528, 8027, 8256, 8670, 9384, 9813, 8425, 8162, 8024, 8897,
                                9284, 8972, 8776, 8121, 9476, 8281, 9065,
                            ],
                        },
                    ],
                    tooltip: {
                        theme: "dark",
                    },
                    grid: {
                        strokeDashArray: 4,
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false,
                        },
                        type: "datetime",
                    },
                    yaxis: {
                        labels: {
                            padding: 4,
                        },
                    },
                    labels: [
                        "2020-06-21",
                        "2020-06-22",
                        "2020-06-23",
                        "2020-06-24",
                        "2020-06-25",
                        "2020-06-26",
                        "2020-06-27",
                        "2020-06-28",
                        "2020-06-29",
                        "2020-06-30",
                        "2020-07-01",
                        "2020-07-02",
                        "2020-07-03",
                        "2020-07-04",
                        "2020-07-05",
                        "2020-07-06",
                        "2020-07-07",
                        "2020-07-08",
                        "2020-07-09",
                        "2020-07-10",
                        "2020-07-11",
                        "2020-07-12",
                        "2020-07-13",
                        "2020-07-14",
                        "2020-07-15",
                        "2020-07-16",
                        "2020-07-17",
                        "2020-07-18",
                        "2020-07-19",
                        "2020-07-20",
                    ],
                    colors: ["color-mix(in srgb, transparent, var(--tblr-primary) 100%)",
                        "color-mix(in srgb, transparent, var(--tblr-gray-400) 100%)"
                    ],
                    legend: {
                        show: false,
                    },
                }).render();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts &&
                new ApexCharts(document.getElementById("chart-active-users-3"), {
                    chart: {
                        type: "radialBar",
                        fontFamily: "inherit",
                        height: 192,
                        sparkline: {
                            enabled: true,
                        },
                        animations: {
                            enabled: false,
                        },
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -120,
                            endAngle: 120,
                            hollow: {
                                margin: 16,
                                size: "50%",
                            },
                            dataLabels: {
                                show: true,
                                value: {
                                    offsetY: -8,
                                    fontSize: "24px",
                                },
                            },
                        },
                    },
                    series: [78],
                    labels: [""],
                    tooltip: {
                        theme: "dark",
                    },
                    grid: {
                        strokeDashArray: 4,
                    },
                    colors: ["color-mix(in srgb, transparent, var(--tblr-primary) 100%)"],
                    legend: {
                        show: false,
                    },
                }).render();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts &&
                new ApexCharts(document.getElementById("chart-revenue-bg"), {
                    chart: {
                        type: "area",
                        fontFamily: "inherit",
                        height: 40,
                        sparkline: {
                            enabled: true,
                        },
                        animations: {
                            enabled: false,
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    fill: {
                        colors: ["color-mix(in srgb, transparent, var(--tblr-primary) 16%)",
                            "color-mix(in srgb, transparent, var(--tblr-primary) 16%)"
                        ],
                        type: "solid",
                    },
                    stroke: {
                        width: 2,
                        lineCap: "round",
                        curve: "smooth",
                    },
                    series: [{
                        name: "Profits",
                        data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53,
                            61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67
                        ],
                    }, ],
                    tooltip: {
                        theme: "dark",
                    },
                    grid: {
                        strokeDashArray: 4,
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        type: "datetime",
                    },
                    yaxis: {
                        labels: {
                            padding: 4,
                        },
                    },
                    labels: [
                        "2020-06-21",
                        "2020-06-22",
                        "2020-06-23",
                        "2020-06-24",
                        "2020-06-25",
                        "2020-06-26",
                        "2020-06-27",
                        "2020-06-28",
                        "2020-06-29",
                        "2020-06-30",
                        "2020-07-01",
                        "2020-07-02",
                        "2020-07-03",
                        "2020-07-04",
                        "2020-07-05",
                        "2020-07-06",
                        "2020-07-07",
                        "2020-07-08",
                        "2020-07-09",
                        "2020-07-10",
                        "2020-07-11",
                        "2020-07-12",
                        "2020-07-13",
                        "2020-07-14",
                        "2020-07-15",
                        "2020-07-16",
                        "2020-07-17",
                        "2020-07-18",
                        "2020-07-19",
                        "2020-07-20",
                    ],
                    colors: ["color-mix(in srgb, transparent, var(--tblr-primary) 100%)"],
                    legend: {
                        show: false,
                    },
                }).render();
        });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts &&
          new ApexCharts(document.getElementById("chart-new-clients"), {
            chart: {
              type: "line",
              fontFamily: "inherit",
              height: 40,
              sparkline: {
                enabled: true,
              },
              animations: {
                enabled: false,
              },
            },
            stroke: {
              width: [2, 1],
              dashArray: [0, 3],
              lineCap: "round",
              curve: "smooth",
            },
            series: [
              {
                name: "May",
                data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67],
              },
              {
                name: "April",
                data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37],
              },
            ],
            tooltip: {
              theme: "dark",
            },
            grid: {
              strokeDashArray: 4,
            },
            xaxis: {
              labels: {
                padding: 0,
              },
              tooltip: {
                enabled: false,
              },
              type: "datetime",
            },
            yaxis: {
              labels: {
                padding: 4,
              },
            },
            labels: [
              "2020-06-21",
              "2020-06-22",
              "2020-06-23",
              "2020-06-24",
              "2020-06-25",
              "2020-06-26",
              "2020-06-27",
              "2020-06-28",
              "2020-06-29",
              "2020-06-30",
              "2020-07-01",
              "2020-07-02",
              "2020-07-03",
              "2020-07-04",
              "2020-07-05",
              "2020-07-06",
              "2020-07-07",
              "2020-07-08",
              "2020-07-09",
              "2020-07-10",
              "2020-07-11",
              "2020-07-12",
              "2020-07-13",
              "2020-07-14",
              "2020-07-15",
              "2020-07-16",
              "2020-07-17",
              "2020-07-18",
              "2020-07-19",
              "2020-07-20",
            ],
            colors: ["color-mix(in srgb, transparent, var(--tblr-primary) 100%)", "color-mix(in srgb, transparent, var(--tblr-gray-600) 100%)"],
            legend: {
              show: false,
            },
          }).render();
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/tabler.js') }}"></script>
</body>

</html>
