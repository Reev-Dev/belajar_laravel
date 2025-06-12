@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="page-header d-print-none" aria-label="Page header">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">SIoT</div>
                        <h2 class="page-title">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="subheader">Suhu</div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2" id="suhu">?⁰C</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="subheader">Kelembaban</div>
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="h1 mb-0 me-2" id="kelembaban">?%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Servo</div>
                                </div>
                                <p class="h1 mb-3" id="servo-text">?⁰</p>
                                <input type="range" class="form-range mb-2" min="0" max="180"
                                    name="servo-slider" id="servo-slider">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">LCD</div>
                                </div>
                                <div class="h1 mb-3" id="servo-text">LCD</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="text-lcd" id="input-lcd"
                                        placeholder="Input" autofocus autocomplete="off">
                                    <button type="button" class="btn btn-primary" id="btn-lcd">
                                        Send
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Device Status Table</h3>
                            </div>
                            <div class="card-table table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>ID Device</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($devices as $device)
                                            <tr>
                                                <td>
                                                    {{ $device->serial_number }}
                                                </td>
                                                <td id="lab1/serial_number/{{ $device->serial_number }}">
                                                    ?</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sensor Table</h3>
                            </div>
                            <div class="card-table table-responsive" style="max-height: 200px; overflow-y: auto;">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead class="sticky-top bg-white">
                                        <tr>
                                            <th class="w-4">No</th>
                                            <th class="w-20">Nama Sensor</th>
                                            <th class="w-10">Data</th>
                                            <th class="w-10">Topic</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sensors as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}
                                                </td>
                                                <td>{{ $item->nama_sensor }}</td>
                                                <td class="text-secondary">{{ $item->data }}</td>
                                                <td class="text-secondary">{{ $item->topic }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" class="text-center mb-[-3]">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script>
        const clientId = Math.random().toString(16).substr(2, 8);
        const host = "wss://siot-laravel.cloud.shiftr.io:443/mqtt";

        const option = {
            keepalive: 30,
            clientId: clientId,
            protocolId: "MQTT",
            protocolVersion: 4,
            username: "siot-laravel",
            password: "tokenwebapp",
            clean: true,
            reconnectPeriod: 1000,
            connectTimeout: 30 * 100,
        }

        console.log("Connecting to broker...");
        const client = mqtt.connect(host, option);
        client.subscribe("lab1/#", {
            qos: 1
        });

        client.on("connect", () => {
            console.log("Connected to broker!");
        })

        client.on("message", (topic, message) => {
            if (topic === "lab1/suhu") {
                document.getElementById("suhu").innerHTML = message + " °C";
            }
            if (topic === "lab1/kelembaban") {
                document.getElementById("kelembaban").innerHTML = message + " %";
            }
            if (topic === "lab1/lcd") {
                document.getElementById("input-lcd").value = message;
            }
            if (topic === "lab1/servo") {
                document.getElementById("servo-text").innerHTML = message;
                document.getElementById("servo-slider").value = parseInt(message);
            }

            @foreach ($devices as $item)
                if (topic === "lab1/serial_number/{{ $item->serial_number }}") {
                    document.getElementById("lab1/serial_number/{{ $item->serial_number }}").innerHTML = message;
                    if (message.toString() === "Online") {
                        document.getElementById("lab1/serial_number/{{ $item->serial_number }}").style.color =
                            "green";
                    } else {
                        document.getElementById("lab1/serial_number/{{ $item->serial_number }}").style.color =
                            "red";
                    }
                }
            @endforeach
        })
    </script>
    <script>
        const servoSlider = document.getElementById('servo-slider');
        const textServo = document.getElementById('servo-text');

        servoSlider.addEventListener('input', () => {
            textServo.textContent = `${servoSlider.value}⁰`;
        })
        servoSlider.addEventListener('mouseup', () => {
            client.publish("lab1/servo", textServo.innerHTML.toString(), {
                qos: 1,
                retain: true
            });
        })


        const btnLcd = document.getElementById('btn-lcd');
        const inputLcd = document.getElementById('input-lcd');

        btnLcd.addEventListener('click', () => {
            const textValue = inputLcd.value;

            if (!textValue) {
                alert('Input tidak boleh kosong');
            } else {
                alert(`text value ${textValue}`);
                client.publish("lab1/lcd", textValue.toString(), {
                    qos: 1,
                    retain: true
                });
            }
        });
    </script>
@endsection
