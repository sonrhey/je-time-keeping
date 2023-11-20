import roles from "../../../constants/roles";
import authenticate from "../../../authentication";

const {
  TEACHER,
}  = roles();

const CURRENT_ROLE = TEACHER;
authenticate(CURRENT_ROLE);
