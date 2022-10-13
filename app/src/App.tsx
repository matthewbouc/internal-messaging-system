import React, {useEffect, useState} from 'react';
import axios from "axios";
import {createTheme, ThemeProvider} from "@mui/material";
import {BrowserRouter, Route, Routes} from "react-router-dom";

import './App.css';
import ThemeForm from "./components/ThemeForm";
import Home from "./components/Home";
import NavigationBar from "./components/NavigationBar";
import TeamChat from "./components/TeamChat";
import {useAppDispatch, useAppSelector} from "./hooks";
import {receivedSettings, SettingState} from "./reducers/userSettingsSlice";


function App() {

    const theme = useAppSelector(state => state.userSettings);
    const dispatch = useAppDispatch();


    useEffect(() => {
        axios.get<SettingState>("http://localhost:8000/api/userSettings")
            .then((response) => {
                console.log('get response, primary: ' + response.data.primaryColor);
                dispatch(receivedSettings(response.data));
            })
            .catch((error) => {
                console.log(error);
            });
    }, []);

    const themeObject = {
        palette: {
            primary: {
                //lighter green for primary buttons
                main: theme.primaryColor,
            },
            secondary: {
                //darker green for nav bar or secondary buttons
                main: theme.secondaryColor,
            },
        },
    };


    const themeConfig = createTheme(themeObject);

    return (
        <ThemeProvider theme={themeConfig}>
            <BrowserRouter>
                <NavigationBar />
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/teamchat" element={<TeamChat />} />
                    <Route path="/form" element={<ThemeForm />} />
                </Routes>
            </BrowserRouter>
        </ThemeProvider>
    );
}

export default App;
