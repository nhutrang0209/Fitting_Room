using UnityEngine;

namespace Fitting_Room
{
    public class AnimationController : MonoBehaviour
    {
        [SerializeField] private Animator animator;

        private readonly int _walkID = Animator.StringToHash("Walking");

        public void SetWalking(bool value)
        {
            animator.SetBool(_walkID, value);
        }
    }
}