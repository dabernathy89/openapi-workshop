@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Contest Name</h1>

            <div class="card mb-4">
                <div class="card-header">Contest Prizes</div>

                <div class="card-body">
                    <p>Add a prize:</p>
                    <form>
                    </form>

                    <ul class="list-group">
                        <li class="list-group-item d-flex align-items-center">
                            <span class="d-inline-block mr-auto">Elephpant</span>

                            <button @click="selectWinner(1)" class="btn btn-secondary mr-3">
                                Select a winner
                            </button>
                            <button @click="deletePrize(1)" class="btn btn-danger">
                                &times;
                            </button>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <span class="d-inline-block mr-auto">Conference Ticket</span>

                            <button @click="selectWinner(2)" class="btn btn-secondary mr-3">
                                Select a winner
                            </button>
                            <button @click="deletePrize(2)" class="btn btn-danger">
                                &times;
                            </button>
                        </li>
                      </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Contestants</div>

                <div class="card-body">
                    <p>Add a contestant:</p>
                    <form>
                    </form>

                    <ul class="list-group">
                        <li class="list-group-item d-flex align-items-center">
                            Rob Lowe
                            <button @click="deleteContestant(1)" class="btn btn-danger ml-auto">
                                &times;
                            </button>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            Meghan Markle
                            <button @click="deleteContestant(2)" class="btn btn-danger ml-auto">
                                &times;
                            </button>
                        </li>
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
