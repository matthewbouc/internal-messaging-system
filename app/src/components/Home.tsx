import React, {useEffect} from 'react';
import logo from '../logo.svg';
import {Button} from "@mui/material";
import axios from "axios";

import Test from './Test';

const Home = () => {
    useEffect(() => {
        axios.get('http://localhost:8000/log/success')
            .then(function (response) {
                // handle success
                console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
    }, []);
    return (
        <div className="App">
            <header className="App-header">
                <img src={logo} className="App-logo" alt="logo" />
                <p>
                    Edit <code>src/App.tsx</code> and save to reload.
                </p>
                <Button>
                    Learn React
                </Button>
                <Test name="Matt" age={22} color="#000" >
                    <h1>"hello"</h1>
                </Test>
            </header>
        </div>
    );
}

export default Home;
