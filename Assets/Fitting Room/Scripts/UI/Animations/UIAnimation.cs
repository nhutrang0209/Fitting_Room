using System;
using UnityEngine;
using UnityEngine.UI;

namespace Fitting_Room
{
    public class UIAnimation : MonoBehaviour
    {
        [SerializeField] private Button idleBtn;
        [SerializeField] private Button walkBtn;

        private Player Player => Player.Instance;

        private void Start()
        {
            idleBtn.onClick.AddListener(OnIdleClick);
            walkBtn.onClick.AddListener(OnWalkClick);
        }

        private void OnIdleClick()
        {
            Player.SetWalking(false);
        }

        private void OnWalkClick()
        {
            Player.SetWalking(true);
        }
    }
}