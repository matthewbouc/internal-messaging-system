import React, {useState} from "react";
import {useAddMessageMutation, useGetMessagesQuery} from "../services/groupMessages";
import TextField from "@mui/material/TextField";
import Button from "@mui/material/Button";


export interface Props {
    groupId: number
}

const ReplyTextBox = (props: Props): JSX.Element => {

    const [tempText, setTempText] = useState('');
    const [addMessage] = useAddMessageMutation();
    const {refetch} = useGetMessagesQuery(props.groupId);


    const onFormSubmit = async () => {
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
            <TextField
                sx={{
                    marginBottom: '5px',
                    marginRight: '5px',
                    border: '1px solid #e2e2e1',
                    borderRadius: 4,
                    backgroundColor: 'white',
                }}
                placeholder="Put text here" multiline rows={2} value={tempText}
                onChange={(event) => setTempText(event.target.value)}/>
            <Button variant="contained" onClick={onFormSubmit}> Submit </Button>
        </div>

    )
};

export default ReplyTextBox;