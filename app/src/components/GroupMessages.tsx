import React, {PropsWithChildren, useEffect, useState} from "react";
import axios from "axios";
import {Accordion} from "@mui/material";
import Typography from "@mui/material/Typography";
import {TestProps} from "./Test";
import {useAppDispatch, useAppSelector} from "../hooks";
import {updateMessages} from "../reducers/messageSlice";
import { useGetMessagesQuery } from "../services/groupMessages";
import {useGetGroupQuery} from "../services/teamChat";

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



const GroupMessages = (props:Props): JSX.Element => {

    const dispatch = useAppDispatch();
    // const messages = useAppSelector(state=>state.messages);
    const { data, isLoading, error } = useGetMessagesQuery(props.groupId);


    // const nothingHere:Array<Message> = [
    //     {
    //         'groupId': 0,
    //         'message': 'test',
    //         'createdAt': '1/1/1',
    //         'status': 'active',
    //         'messageId': 0,
    //     }
    // ];

    // const [tempMessages, setTempMessages] = useState(nothingHere);
    //
    // useEffect(() => {
    //     console.log(`prop being passed to GroupMessages component = ${props.groupId}`);
    //     axios.get(`http://localhost:8000/api/groupMessages/${props.groupId}`)
    //         .then((response) => {
    //             console.log('useeffect in GroupMessages: response.data is ');
    //             console.log( response.data);
    //             // setTempMessages( tempMessages );
    //             dispatch(updateMessages(response.data));
    //             // console.log('tempMessages after setTempMessages in GroupMessages: ');
    //             // console.log(tempMessages);
    //             console.log('!!!! Here is messages.messages');
    //             console.log(data);
    //         })
    //         .catch((error) => {
    //             console.log(error);
    //         });
    //
    // }, []);

    if (isLoading) return <div>Is Loading...</div>;
    if (error) return <div> Something went wrong </div>;
    return (
            <div>
            {data?.messages.map((message, i:number) => {
                return (
                        <div key={i}>
                            <Typography> {message.message} </Typography>
                        </div>

                )
            })}
            </div>

    )
};

export default GroupMessages;