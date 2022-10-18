import React, {useEffect} from "react";
import axios from "axios";
import Typography from "@mui/material/Typography";
import GroupMessages from "./GroupMessages";
import {useAppDispatch, useAppSelector} from "../hooks";
import {GroupObjectState, updateGroups} from "../reducers/groupSlice";
import { useGetGroupQuery } from "../services/teamChat";
import {Accordion, AccordionDetails, AccordionSummary, Grid, Paper} from "@mui/material";
import ExpandMoreIcon from "@mui/icons-material/ExpandMore";
import Box from "@mui/material/Box";

const TeamChat = (): JSX.Element => {

    const dispatch = useAppDispatch();
    // const groups = useAppSelector(state=>state.groups);
    const { data, isLoading, error } = useGetGroupQuery(undefined);

    // const [tempGroups, setTempGroups] = useState(groupHolder);

    if (isLoading) return <div>Is Loading...</div>;
    if (error) return <div> Something went wrong </div>;

    // useEffect(() => {
    //
    //     axios.get("http://localhost:8000/api/userGroups/1")
    //         .then((response) => {
    //             console.log(response.data);
    //             dispatch(updateGroups(response.data));
    //             console.log('useEffect TeamChat response after setTempGroups: ');
    //             console.log(groups);
    //         })
    //         .catch((error) => {
    //             console.log(error);
    //         });
    // }, []);


    return (
        <div>
            {data?.groups.map((group, i:number) => {
                return (
                <Accordion key={i}>
                    <AccordionSummary expandIcon={<ExpandMoreIcon />}>
                        <Typography>
                            {group.groupName}
                        </Typography>
                    </AccordionSummary>
                    <AccordionDetails>
                    <Grid
                        sx={{
                        width: "100vw",
                        height: "100vh",
                        display: "flex",
                        alignItems: "center",
                        justifyContent: "center"}}
                    >
                        <Grid sx={{
                            width: "80vw",
                            height: "80vh",
                            maxWidth: "500px",
                            maxHeight: "700px",
                            display: "flex",
                            alignItems: "center",
                            flexDirection: "column",
                            position: "relative",
                        }}>
                            <Grid
                                sx={{
                                width: "calc( 100% - 20px )",
                                margin: 10,
                                overflowY: "scroll",
                                height: "calc( 100% - 80px )"
                            }}>
                                <GroupMessages groupId={group.groupId} />
                            </Grid>
                        </Grid>
                    </Grid>
                        </AccordionDetails>
                    </Accordion>
                )
            })}
            <div>
            </div>
        </div>
    )
};




export default TeamChat;