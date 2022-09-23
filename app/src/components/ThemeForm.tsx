import React, {Dispatch, SetStateAction, useEffect, useState} from "react";
import axios from "axios";
import Box from "@mui/material/Box";
import Button from "@mui/material/Button";
import TextField from '@mui/material/TextField';

interface Props {
    primary: string;
    secondary: string;
    setSecondary: Dispatch<SetStateAction<string>>;
    setPrimary: Dispatch<SetStateAction<string>>;
}

const ThemeForm = (props:Props):JSX.Element => {

    const SERVER = "http://localhost:8000/api/userSettings";
    const [tempPrimary, setTempPrimary] = useState(props.primary);
    const [tempSecondary, setTempSecondary] = useState(props.secondary);

    useEffect(() => {
        console.log('use effect triggered')
        setTempPrimary(props.primary);
        setTempSecondary(props.secondary);
    }, [props.primary, props.secondary]);

    const onFormSubmit = () => {
        const colors = {"color1":tempPrimary, "color2":tempSecondary};

        console.log(colors);
        axios.post(SERVER, colors).then((response) => {
            console.log(response);
            props.setPrimary(response.data.color1);
            props.setSecondary(response.data.color2);

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