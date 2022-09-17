import React, { useEffect, useState } from "react";
import axios from "axios";
import Box from "@mui/material/Box";
import Button from "@mui/material/Button";
import TextField from '@mui/material/TextField';

const ThemeForm = ():JSX.Element => {

    const SERVER = "http://localhost:8000/api/userSettings";
    const [primaryColor, setPrimaryColor] = useState('');
    const [secondaryColor, setSecondaryColor] = useState('');

    useEffect(() => {
        axios.get(SERVER)
            .then((response) => {
                console.log(response);
                setPrimaryColor(response.data.color1);
                setSecondaryColor(response.data.color2);
            })
            .catch((error) => {
                console.log(error);
            });
    }, []);

    const onFormSubmit = () => {
        const colors = {"color1":primaryColor, "color2":secondaryColor};
        console.log(colors);
        axios.post(SERVER, colors).then((response) => {
            console.log(response);
        }).catch((error) => {
            console.log(error);
        });
    }

    return (
        <Box
            component="form"
            sx={{
                '& > :not(style)': { m: 1 },
                maxWidth: 300
            }}
            noValidate
            autoComplete="off"
        >
            <TextField value={primaryColor} onChange={(event)=> setPrimaryColor(event.target.value)}/>
            <TextField value={secondaryColor} onChange={(event) => setSecondaryColor(event.target.value)} />

            <Button onClick={onFormSubmit}>
                In ThemeForm
            </Button>
        </Box>
    )
}


export default ThemeForm;