import React from "react";
import Typography from "@mui/material/Typography";
import GroupMessages from "./GroupMessages";
import {useAppDispatch} from "../hooks";
import {useDeleteGroupMutation, useGetGroupQuery} from "../services/teamChat";
import {Accordion, AccordionDetails, AccordionSummary, Grid} from "@mui/material";
import ExpandMoreIcon from "@mui/icons-material/ExpandMore";
import Button from "@mui/material/Button";
import ReplyTextBox from "./ReplyTextBox";

const TeamChat = (): JSX.Element => {

    const dispatch = useAppDispatch();
    const {data, isLoading, error} = useGetGroupQuery(undefined);
    const [deleteGroup] = useDeleteGroupMutation();
    const {refetch} = useGetGroupQuery(undefined);

    if (isLoading) return <div>Is Loading...</div>;
    if (error) return <div> Something went wrong </div>;

    const deleteUserGroup = async (userGroupId: number | null) => {
        console.log(userGroupId);
        await deleteGroup(userGroupId);
        refetch();
    }

    return (
        <div>
            <Grid container justifyContent='center'>
                {data?.groups.map((group, i: number) => {
                    return (
                        <Grid item xs={10} sx={{marginBottom: '10px'}} key={i}>
                            <Accordion sx={{backgroundColor: "#d4d5d8"}}>
                                <AccordionSummary expandIcon={<ExpandMoreIcon/>}>
                                    <Typography sx={{width: '80%'}}>
                                        {group.groupName}
                                    </Typography>
                                    <Button sx={{justifyContent: 'right'}} variant="contained" onClick={() => {
                                        deleteUserGroup(group.userGroupId)
                                    }}> Delete </Button>
                                </AccordionSummary>
                                <AccordionDetails>
                                    <Grid
                                        sx={{
                                            width: "50vw",
                                            height: "50vh",
                                            display: "flex",
                                            alignItems: "center",
                                            justifyContent: "center",
                                            backgroundColor: "#d4d5d8",
                                        }}
                                    >
                                        <Grid sx={{
                                            width: "50vw",
                                            height: "50vh",
                                            maxWidth: "800px",
                                            maxHeight: "800px",
                                            display: "flex",
                                            alignItems: "center",
                                            flexDirection: "column",
                                            position: "relative",
                                            backgroundColor: "#f1f1f1",
                                        }}>
                                            <Grid
                                                sx={{
                                                    width: "calc( 100% - 20px )",
                                                    margin: 10,
                                                    overflowY: "scroll",
                                                    height: "calc( 100% - 20px )",
                                                    backgroundColor: '#fff',
                                                }}>
                                                <GroupMessages groupId={group.groupId}/>
                                            </Grid>
                                            <ReplyTextBox groupId={group.groupId}/>

                                        </Grid>
                                    </Grid>
                                </AccordionDetails>
                            </Accordion>
                        </Grid>
                    )
                })}
            </Grid>

        </div>
    )
};


export default TeamChat;