import React, {PropsWithChildren, useEffect, useState} from "react";
import axios from "axios";
import {Accordion} from "@mui/material";
import Typography from "@mui/material/Typography";
import {TestProps} from "./Test";
import {useAppDispatch, useAppSelector} from "../hooks";
import {updateMessages} from "../reducers/messageSlice";
import {useAddMessageMutation, useGetMessagesQuery} from "../services/groupMessages";
import {useGetGroupQuery} from "../services/teamChat";
import TextField from "@mui/material/TextField";
import Button from "@mui/material/Button";
import {receivedSettings, SettingState} from "../reducers/userSettingsSlice";


export interface Props {
    groupId: number
}

const ReplyTextBox = (props:Props): JSX.Element => {

    const [ tempText, setTempText ] = useState('');
    const [addMessage] = useAddMessageMutation();
    const { refetch } = useGetMessagesQuery(props.groupId);


    const onFormSubmit = async() => {
        const message = {
        "message": tempText,
        "author": 1,
        "groupId": props.groupId,
        };
        console.log("here is message");
        console.log(message);
        await addMessage(message);
        setTempText('');
        refetch();
    }

    return (
        <div>
            <TextField placeholder="Put text here" multiline rows={2} value={tempText} onChange={(event) => setTempText(event.target.value)}/>
            <Button variant="contained" onClick={onFormSubmit}> Submit </Button>
        </div>

    )
};

export default ReplyTextBox;