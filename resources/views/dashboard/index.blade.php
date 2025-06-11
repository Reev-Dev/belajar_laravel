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
                    <div class="col-12">
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
                    {{-- <div class="col-12">
                        <div class="row row-cards">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span
                                                    class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="icon icon-1">
                                                        <path
                                                            d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2">
                                                        </path>
                                                        <path d="M12 3v3m0 12v3"></path>
                                                    </svg></span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">132 Sales</div>
                                                <div class="text-secondary">12 waiting payments</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span
                                                    class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler.io/icons/icon/shopping-cart -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="icon icon-1">
                                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M17 17h-11v-14h-2"></path>
                                                        <path d="M6 5l14 1l-1 7h-13"></path>
                                                    </svg></span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">78 Orders</div>
                                                <div class="text-secondary">32 shipped</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span
                                                    class="bg-x text-white avatar"><!-- Download SVG icon from http://tabler.io/icons/icon/brand-x -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="icon icon-1">
                                                        <path d="M4 4l11.733 16h4.267l-11.733 -16z"></path>
                                                        <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path>
                                                    </svg></span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">623 Shares</div>
                                                <div class="text-secondary">16 today</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span
                                                    class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler.io/icons/icon/brand-facebook -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="icon icon-1">
                                                        <path
                                                            d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3">
                                                        </path>
                                                    </svg></span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">132 Likes</div>
                                                <div class="text-secondary">21 today</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
            username: "SIoT_Laravel",
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
