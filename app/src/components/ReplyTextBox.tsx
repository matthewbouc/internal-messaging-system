import React, {PropsWithChildren, useEffect, useState} from "react";
import axios from "axios";
import {Accordion} from "@mui/material";
import Typography from "@mui/material/Typography";
import {TestProps} from "./Test";
import {useAppDispatch, useAppSelector} from "../hooks";
import {updateMessages} from "../reducers/messageSlice";
import { useGetMessagesQuery } from "../services/groupMessages";
import {useGetGroupQuery} from "../services/teamChat";
import TextField from "@mui/material/TextField";
import Button from "@mui/material/Button";
import {receivedSettings, SettingState} from "../reducers/userSettingsSlice";

// export interface Message {
//     groupId: number,
//     message: string,
//     createdAt: string,
//     status: string,
//     messageId: number,
// }

export interface Props {
    groupId: number
}



const ReplyTextBox = (props:Props): JSX.Element => {

    const dispatch = useAppDispatch();
    const { data, isLoading, error } = useGetMessagesQuery(props.groupId);

    const [ tempText, setTempText ] = useState('');

    const onFormSubmit = () => {
        return {}
    }

    if (isLoading) return <div>Is Loading...</div>;
    if (error) return <div> Something went wrong </div>;
    return (
        <div>
            <TextField placeholder="Put text here" multiline rows={2} value={tempText} onChange={(event) => setTempText(event.target.value)}/>
            <Button variant="contained" onClick={onFormSubmit}> Submit </Button>
        </div>

    )
};

export default ReplyTextBox;