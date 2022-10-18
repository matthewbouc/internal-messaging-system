import React, {Dispatch, SetStateAction, useEffect, useState} from "react";
import axios, {AxiosResponse} from "axios";
import Box from "@mui/material/Box";
import Button from "@mui/material/Button";
import TextField from '@mui/material/TextField';
import { useAppSelector, useAppDispatch } from "../hooks";
import { receivedSettings, SettingState } from "../reducers/userSettingsSlice";


const ThemeForm = ():JSX.Element => {

    const SERVER = "http://localhost:8000/api/userSettings";

    const dispatch = useAppDispatch();
    const theme = useAppSelector(state => state.userSettings);

    const [tempPrimary, setTempPrimary] = useState(theme.primaryColor);
    const [tempSecondary, setTempSecondary] = useState(theme.secondaryColor);

    useEffect(() => {
        console.log('use effect triggered')
    }, [theme]);

    const onFormSubmit = () => {
        const colors = {"primaryColor":tempPrimary, "secondaryColor":tempSecondary};

        console.log(colors);
        axios.put(SERVER, colors)
            .then((response) => {
                console.log(response);
            }).then(() => {
                axios.get<SettingState>("http://localhost:8000/api/userSettings")
                .then((response) => {
                    dispatch(receivedSettings(response.data));
            })
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
            <TextField value={tempPrimary} onChange={(event)=> setTempPrimary(event.target.value)}/>
            <div style={{height:"100px", width:"100px", backgroundColor:tempPrimary, borderStyle:"solid"}}></div>
            <TextField value={tempSecondary} onChange={(event) => setTempSecondary(event.target.value)} />
            <div style={{height:"100px", width:"100px", backgroundColor:tempSecondary, borderStyle:"solid"}}></div>

            <Button variant="contained" onClick={onFormSubmit}>
                In ThemeForm
            </Button>

            <Button color="secondary" variant="contained">Secondary</Button>
        </Box>
    )
}


export default ThemeForm;