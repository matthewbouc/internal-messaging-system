import React, {useEffect} from 'react';
import logo from './logo.svg';
import './App.css';
import {Button} from "@mui/material";
import axios from "axios";

function App() {
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
      </header>
    </div>
  );
}

export default App;
